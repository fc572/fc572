<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

         <div id="centre" class="box">

          <h2>${message}</h2>
             <p>
                <h4> The value ${messageCode} that you have requested is not a valid HTTP Code</h4>
             </p>
            </div>

           <div id="centre" class="box">
             <p>
                <br/>
                <h4> Need another code? Insert it below </h4>
                 <form action="/form" method="post">
                     <label for="Code">Code Numeric Value</label><input type="text" name="codeInput" id="codeInput"></input><br/>
                     <input id="submit" type="submit">
                 </form>
             </p>
           </div>
          </body>

       </html>