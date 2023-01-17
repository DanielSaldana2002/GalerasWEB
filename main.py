import requests
import json

def ultimateProductos():
    url = "http://localhost:3000/carta"
    payload={}
    headers = {}
    response = requests.request("GET", url, headers=headers, data=payload)
    carta = json.loads(response.text)
    for i in range(len(carta)):
        id = carta[i]['id']
    return id

def ultimateCategoria():
    url = "http://localhost:3000/Categoria"
    payload = ""
    headers = {}
    response = requests.request("GET", url, headers=headers, data=payload)
    categoria = json.loads(response.text)

    for i in range(len(categoria)):
        id = categoria[i]['id']
    return id

def addProductos(id, nombre, categoria):
    url = "http://localhost:3000/carta"
    id = id+1
    payload = json.dumps({
        "id": id,
        "nombre": nombre,
        "Categoria": categoria
    })
    headers = {
        'Content-Type': 'application/json'
    }
    response = requests.request("POST", url, headers=headers, data=payload)
    print('Producto añadido correctamente')

def addCategoria(id, nombre):
    url = "http://localhost:3000/Categoria"
    id = id+1
    payload = json.dumps({
        "nombre": nombre,
        "id": id
    })
    headers = {
        'Content-Type': 'application/json'
    }
    response = requests.request("POST", url, headers=headers, data=payload)
    print('Categoria añadida correctamente')

print(ultimateCategoria())
print('\nBienvenido a Galeras CMD:\n')
print('Escribe la operacion que deseas realizar:\n1)Agregar productos\n2)Agregar categorias\n3)Visualizar productos\n4)Visualizar categorias\n5)Salir')
opc = input()
if(opc == '1'):
    print('¿Como se llama el producto que deseas añadir?')
    nombre = input('Nombre: ')
    print('¿Que categoria pertenece?')
    categoria = input('Categoria: ')
    addProductos(ultimateProductos(), nombre, categoria)
elif(opc == '2'):
    print('¿Como se llama el nombre de la categoria')
    nombre = input('Nombre: ')
    addCategoria(ultimateCategoria(), nombre)
