# -*- coding: utf-8 -*-
__author__ = "uLeandroSP"
__copyright__ = "uLeandroSP"
__credits__ = ["https://github.com/UleandroSI/SaveURL"]
__license__ = "MIT License"
__version__ = "1.0"
__maintainer__ = "uLeandroSP"
__email__ = "uleandrosp7@gmail.com"
__status__ = "Development"


from pickle import TRUE
from flask import Flask, Response, request, jsonify
#from flask_sqlalchemy import SQLAlchemy
#import _mysql_connector
#import json

# Aplicação
app = Flask(__name__)

@app.route("/")
def index():
    return "Ola mundo."

@app.route("/pessoas")
def pessoas(nome, cidade):
    return jsonify({"nome": nome, "cidade": cidade})


app.run(debug=True)
