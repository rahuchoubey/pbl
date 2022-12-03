from flask import Flask, render_template, request
from pymysql import connections
import os
import boto3
from config import *

app = Flask(__name__)

bucket = custombucket
region = customregion

db_conn = connections.Connection(
    host=customhost,
    port=3306,
    user=customuser,
    password=custompass,
    db=customdb

)
output = {}
table = 'customer_info'


@app.route("/", methods=['GET', 'POST'])
def home():
    return render_template('index.html')


@app.route("/index.html", methods=['POST'])
def customer():
    customer_id= request.form['customer_id']
    name = request.form['name']
    email = request.form['email']
    contact = request.form['contact']
    gender = request.form['gender']
    

    insert_sql = "INSERT INTO customer_info VALUES (%s, %s, %s, %s, %s)"
    cursor = db_conn.cursor()


    try:

        cursor.execute(insert_sql, (customer_id, name, email, contact, gender))
        db_conn.commit()


    finally:
        cursor.close()

    print("all modification done...")
    return render_template('AddEmpOutput.html', name=emp_name)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80, debug=True)