<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

<h3>${message}</h3>

<form class="comment box" name="commentsForm" action="/writeComment" method="post">

	<label>User Id:</label> <input class="formInputFormat" type="text" name="writeUserId" id="writeUserId" value=${writeUserId}></input></br>

	<label>User Key:</label> <input class="formInputFormat" type="text" name="writeUserKey" id="writeUserKey" value=${writeUserKey}></input></br>

	<label>Comment:</label> <textarea class="formInputFormat" name="writeComment" id="writeComment" value=${writeComment}></textarea></br></br>

    <input type="submit" name="submit" id="submit" value="Send comment"  />

</form>

    <form class="comment box" name="commentsForm">
        <label>User Id:</label> <label>${userId}</td></label>
        <label>User Key:</label> <label>${userKey}</td></label>
        <label>Comment:</label> <label>${comment}</td></label>
    </form>


</html>