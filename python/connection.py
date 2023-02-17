import requests
import json

url = "http://localhost:3000/EnviarBaseDeDatos"

payload={}
headers = {}

response = requests.request("GET", url, headers=headers, data=payload)

APIsJSON = json.loads(response.text)
print(APIsJSON[1])

