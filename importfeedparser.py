import feedparser
import sqlite3
import requests
from sqlite3 import Error
from bs4 import BeautifulSoup  # HTML parsing library
from PIL import Image
import pyodbc
import os
import urllib.request

import mysql.connector

def create_connection(host, user, password, database):
    conn = None
    try:
        conn = mysql.connector.connect(
            host=host,
            user=user,
            password=password,
            database=database
        )
        return conn
    except mysql.connector.Error as e:
        print(f"Hata: {e}")
    return conn

# Bağlantıyı oluşturmak için bağlantı bilgilerinizi kullanın
conn = create_connection(
    host='localhost',
    user='root',
    password='',
    database='blogworld'
)

# def create_table(conn):
#     try:
#         sql_create_news_table = """ CREATE TABLE news (
#     id INT PRIMARY KEY IDENTITY(1,1),
#     title NVARCHAR(MAX) NOT NULL,
#     link NVARCHAR(MAX) NOT NULL,
#     published NVARCHAR(MAX) NOT NULL,
#     summary NVARCHAR(MAX),
#     image NVARCHAR(MAX),
#     content NVARCHAR(MAX)
# ); """
#         c = conn.cursor()
#         c.execute(sql_create_news_table)
#     except Error as e:
#         print(f"Hata: {e}")

feeds = ['https://www.aspor.com.tr/rss/galatasaray.xml']  # Please replace with the correct RSS feed URL
topics = ['Galatasaray', 'Transfer', 'maç']
# conn = create_connection('DRIVER={ODBC Driver 17 for SQL Server};SERVER=DESKTOP-78I8UB5;DATABASE=AlpDb;Trusted_Connection=yes;')

def extract_content_and_image(url):
    page = requests.get(url)
    soup = BeautifulSoup(page.content, 'html.parser')

    content_div = soup.find('div', {'class': 'detail__content'})  # Please replace with the correct CSS selector
    content = content_div.get_text() if content_div else None

    image_tag = soup.find('img', {'class': 'media__item'})  # Please replace with the correct CSS selector
    image = image_tag.get('src') if image_tag else None

    return content, image

def download_and_resize_image(img_url, img_name):
    urllib.request.urlretrieve(img_url, f"images/{img_name}_original.jpg")

    img = Image.open(f"images/{img_name}_original.jpg")
    img = img.resize((640, 640), Image.ANTIALIAS)
    img.save(f"images/{img_name}_640x640.jpg")

if conn is not None:
    # create_table(conn)
    c = conn.cursor()

    if not os.path.exists('images'):
        os.makedirs('images')

    for feed in feeds:
        try:
            d = feedparser.parse(feed)
        except Exception as e:
            print(f"Feed parse edilemedi: {feed}. Hata: {e}")
            continue

        for entry in d.entries:
            soup = BeautifulSoup(entry.summary, "html.parser")
            img = soup.find("img")
            desc = soup.text.replace("Devamı için tıklayınız", "")
            # desc = soup.get_text(separator=" ")  # desc verisini metin dizesine dönüştürüyoruz

            for topic in topics:
                if topic in entry.title:
                    c.execute("SELECT * FROM news WHERE link=%s", (entry.link,))
                    rows = c.fetchall()
                    if len(rows) == 0:
                        content, image = extract_content_and_image(entry.link)
                        if image:
                            img_name = entry.link.split("/")[-1]
                            download_and_resize_image(image, img_name)
                            image = f"images/{img_name}_640x640.jpg"
                        c.execute("INSERT INTO news(title, link, published, summary, image, content) VALUES(%s, %s, %s, %s, %s, %s)", 
                                (entry.title, entry.link, entry.published, desc, str(img), content))  # img verisini metin dizesine dönüştürüyoruz

    conn.commit()
    conn.close()
else:
    print("Hata! Veritabanı bağlantısı oluşturulamıyor.")