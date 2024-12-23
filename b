from selenium import webdriver
from selenium.webdriver.chrome import service as fs
from selenium.webdriver.common.by import By
from time import sleep
import openpyxl as px
import os
# 定数
DRIVER_PASS = "driver/chromedriver.exe" # ChromeDriver のパス
TARGET_URL = "https://www.fsa.go.jp/fsaNewsListAll_rss2.xml" # chrome で開くURL
OUTPUT_FOLDER = "xlsx10"
OUTPUT_FILE = "金融庁.xlsx"
# chrome 環境の準備
chrome_service = fs.Service(DRIVER_PASS)
chrome_optiton = webdriver.ChromeOptions()
chrome_optiton.add_experimental_option("excludeSwitches", ["enablelogging"])
chrome_driver = webdriver.Chrome(service=chrome_service,
options=chrome_optiton)
# 指定された URL を chrome で開く
chrome_driver.get(TARGET_URL)
sleep(2)

items = chrome_driver.find_elements(By.TAG_NAME,"item")

wb = px.Workbook()
ws = wb.active
ws.title="金融庁 RSS"
for item in items:
    title = item.find_element(By.TAG_NAME,"title")
    link = item.find_element(By.TAG_NAME,"link")
    ws.append([title.get_attribute("textContent"), link.get_attribute("textContent")])

output_path = os.path.join(OUTPUT_FOLDER, OUTPUT_FILE)
wb.save(output_path)
