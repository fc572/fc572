<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

<h2>${message}</h2>

<form class="comment box" name="commentsForm" action="/comment" method="post">

	<label>Name:</label> <input class="formInputFormat" type="text" name="userId" id="userId" value=${userId}></input></br>

	<label>Subject:</label> <input class="formInputFormat" type="text" name="userKey" id="userKey" value=${userKey}></input></br>

	<label>Comment:</label> <textarea class="formInputFormat" name="comment" id="comment" value=${comment}></textarea></br></br>

    <input type="submit" name="submit" id="submit" value="Send comment"  />

</form>

</html>