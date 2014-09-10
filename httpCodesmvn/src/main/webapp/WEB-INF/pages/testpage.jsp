<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

    <%@ include file="../templates/topofthepage.jsp"%>

    <div id="centre" class="box">
       <p>On this page there are elements to be found with selenium web driver </p>
       <form>
          Find Element By Id <input class="addBorder" type="text" size="35" id="FindMeById"/><br>
          Find Element By name: <input class="addBorder" type="text" size="35" name="FindMeByName"/>
       </form>
       <br/>
       <div class="findMeByClassName addBorder"> Find me by class name </div>
       <br/>
       <div><a class="addBorder" href="<spring:url value="testPageLinkBack"/>">FindMeByLinkText</a> This links to a test page </div>
       <br/>
       <div><a class="addBorder" href="<spring:url value="testPageLinkBack"/>">FindMeByPartialLinkText</a> This links to a test page, again </div>
       <br/>
       <div class="addBorder" id="findMeByCssSelector"> Find me by Css Selector </div>
       <br/>
       <div class="addBorder">
          Because Css Selectors are a lot, see <a href="http://www.w3schools.com/cssref/css_selectors.asp"> here in the W3schools website <a/>
          I am going to add a list, check boxes and radio buttons as those are the most likely to be found on a web page <br/>
          <ul>
             <li> I am the first element of the list</li>
             <li> I am the second element of the list</li>
             <li> I am the third element of the list</li>
          </ul>
       </div>
       <br/>
       <div class="addBorder">
          Check boxes:
          <form>
             <input type="checkbox" id="vehicle" value="MotoBike"> My Bike is the fastest <br/>
             <input type="checkbox" id="vehicle" value="Car"> My Car is the slowest <br/>
          </form>
       </div>
       <br/>
       <div class="addBorder">
          Radio buttons:
          <form>
             <input type="radio" name="feetFunction" value="Walk"> I like to walk <br/>
             <input type="radio" name="feetFunction" value="Run">  I like to run <br/>
          </form>
       </div>
    </div>
</html>
