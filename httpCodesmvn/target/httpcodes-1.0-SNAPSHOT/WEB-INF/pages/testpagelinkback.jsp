<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

<div id="centre" class="box">
        <strong> I have clicked a link and I have landed here. </a></strong>
        <p>
            Now I want to click this <a href="<spring:url value="/testpage"/>"> link </a> to go back on the page from where I coming from
        </p>
</div>
</body>
</html>

