<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<%@ include file="../templates/topofthepage.jsp"%>

                <div id="centre" class="box">
                   <h2>${message}</h2>
                <div><a class="addBorder" href="<spring:url value="testpagelinkback"/>">test page link back</a> This links to a test page </div>
                       <br/>
               <div><a class="addBorder" href="<spring:url value="testpage"/>">test page</a> This links to a test page </div>
                       <br/>
                    <button>  return "forward:/HttpCodesController";  </button>
                <div><class="addBorder" href="<spring:url value="codepage"/>">HTTP codes page</a> This links to http codes page </div>
                       <br/>
                       <button>  return "forward:/UserCommentController";  </button>
                <div><a class="addBorder" href="<spring:url value="commentpage"/>">HTTP codes page</a> This links to test form submission </div>
                                       <br/>
                </div>
             </div>
          </body>
           </div>
       </html>