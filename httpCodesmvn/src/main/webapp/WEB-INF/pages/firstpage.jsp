<%@ page language="java" contentType="text/html; charset=ISO-8859-1"

pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

          <head>
             <title>HTTP CODES</title>
          </head>

          <body>
             <h2>${message}</h2>

               <form action="/form" method="post">
                    <label for="Code">Code Numeric Value</label><input type="text" name="numericValue" id="numericValue"></input><br/>
                     <input type="submit">
               </form>

          </body>

       </html>