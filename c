from selenium import webdriver
from selenium.webdriver.chrome import service as fs
from selenium.webdriver.common.by import By
from time import sleep
import openpyxl as px
import os

DRIVER_PASS = "driver\\chromedriver.exe"
YAHOO_URL = "https://www.yahoo.co.jp/"
SEARCH_WORD = "日本電子専門学校"
OUTPUT_FOLDER = "xlsx08"
OUTPUT_FILE = f"{OUTPUT_FOLDER}\\search_yahoo_日本電子専門学校.xlsx"

chrome_service = fs.Service(DRIVER_PASS)
chrome_option = webdriver.ChromeOptions()
chrome_option.add_experimental_option("excludeSwitches", ["enable-logging"])
chrome_driver = webdriver.Chrome(service=chrome_service, options=chrome_option)

if not os.path.exists(OUTPUT_FOLDER):
    os.makedirs(OUTPUT_FOLDER)

wb_output = px.Workbook()
ws_output = wb_output.active
ws_output.append(["タイトル", "URL"])

chrome_driver.get(YAHOO_URL)
sleep(2)

search_bar = chrome_driver.find_element(By.NAME, "p")
search_bar.send_keys(SEARCH_WORD)
search_bar.submit()
sleep(5) 

results = []
try:

    search_results = chrome_driver.find_elements(By.CSS_SELECTOR, "div.sw-CardBase")
    for result in search_results[:20]:
        try:
            title_element = result.find_element(By.CSS_SELECTOR, "h3")
            url_element = result.find_element(By.CSS_SELECTOR, "a")
            title = title_element.text
            url = url_element.get_attribute("href")
            if title and url:
                results.append({"title": title, "url": url})
        except Exception as e:
            print(f"結果の取得失敗: {e}")
except Exception as e:
    print(f"検索結果が見つかりませんでした: {e}")

for row, result in enumerate(results, start=2):
    ws_output[f"A{row}"] = result["title"]
    ws_output[f"B{row}"] = result["url"]

wb_output.save(OUTPUT_FILE)
wb_output.close()

chrome_driver.quit()
