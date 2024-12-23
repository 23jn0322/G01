from selenium import webdriver
from selenium.webdriver.chrome import service as fs
from selenium.webdriver.common.by import By
from time import sleep
import openpyxl as px
import os

# 設定
DRIVER_PASS = "driver\\chromedriver.exe"
TARGET_URL = "https://www.google.co.jp/"
INPUT_FILE = "Z:\\Python\\xlsx08\\words_urls.xlsx"
OUTPUT_FOLDER = "xlsx08"
OUTPUT_FILE = f"{OUTPUT_FOLDER}\\words_urls_checked.xlsx"

chrome_service = fs.Service(DRIVER_PASS)
chrome_option = webdriver.ChromeOptions()
chrome_option.add_experimental_option("excludeSwitches", ["enable-logging"])
chrome_driver = webdriver.Chrome(service=chrome_service, options=chrome_option)

wb_input = px.load_workbook(INPUT_FILE)
ws_input = wb_input.active

if not os.path.exists(OUTPUT_FOLDER):
    os.makedirs(OUTPUT_FOLDER)

wb_output = px.Workbook()
ws_output = wb_output.active

chrome_driver.get(TARGET_URL)
sleep(2)

for row in ws_input.iter_rows(min_row=1, max_row=ws_input.max_row, values_only=True):
    keyword = row[0]
    expected_url = row[1]
    if not keyword or not expected_url:
        continue

    search_bar = chrome_driver.find_element(By.NAME, "q")
    search_bar.clear()
    search_bar.send_keys(keyword)
    search_bar.submit()
    sleep(30)

    try:
        search_results = chrome_driver.find_elements(By.CSS_SELECTOR, "div.yuRUbf a")
        urls_on_page = [result.get_attribute("href") for result in search_results if result.get_attribute("href")]

        if any(expected_url in url for url in urls_on_page):
            check_result = "〇"
        else:
            check_result = "×"
    except Exception as e:
        check_result = "エラー"


    full_url = f"http://{expected_url}" if not expected_url.startswith("http") else expected_url
    ws_output.append([keyword, f'=HYPERLINK("{full_url}", "{full_url}")', check_result])

wb_output.save(OUTPUT_FILE)
wb_output.close()

chrome_driver.quit()
