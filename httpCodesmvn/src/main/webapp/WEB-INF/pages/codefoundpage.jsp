<%@ page language="java" contentType="text/html; charset=ISO-8859-1"

pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

          <head>
             <title>HTTP CODES</title>
          </head>

          <body>
          <h2>${message}</h2>
           <h2>${messageToAHuman}</h2>
             <p>
                <label for="Code">Code Numeric Value is: </label><name="numericValue" id="numericValue">${messageCode}</input><br/><br/>
                <label for="ToAHumanMeans">To A Human Means: </label><name="ToAHumanMeans" id="ToAHumanMeans">${messageToAHuman}</input><br/>
             </p>

             <p>
                <br/>
                <h3> Need another code? Insert it below </h3>
                 <form action="/form" method="post">
                     <label for="Code">Code Numeric Value</label><input type="text" name="numericValue" id="numericValue"></input><br/>
                     <input type="submit">
                 </form>
             </p>

          </body>

       </html>