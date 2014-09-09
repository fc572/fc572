<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

                <div id="centre" class="box">
                   <h2>${message}</h2>
                    <form action="/form" method="post">
                        <label for="Code">Code Numeric Value</label><input type="text" name="codeInput" id="codeInput"></input><br/>
                        </br>
                        <input id="submit" type="submit">
                    </form>
                </div>
             </div>
          </body>
           </div>
       </html>