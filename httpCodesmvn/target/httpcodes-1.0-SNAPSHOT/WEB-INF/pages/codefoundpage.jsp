<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

         <div id="centre" class="box">

             <p>
                <label for="Code">Code Numeric Value is: </label><name="codeInput" id="codeInput">${messageCode}</input><br/><br/>
                <label for="ToAHumanMeans">To A Human Means: </label><name="ToAHumanMeans" id="ToAHumanMeans">${messageToAHuman}</input><br/>
             </p>
         </div>

         <div id="centre" class="box">
             <p>
                <h3> Need another code? Insert it below </h3>
                 <form action="/form" method="post">
                     <label for="Code">Code Numeric Value</label><input type="text" name="codeInput" id="codeInput"></input><br/>
                     <input id="submit" type="submit">
                 </form>
             </p>
         </div>
          </body>

       </html>