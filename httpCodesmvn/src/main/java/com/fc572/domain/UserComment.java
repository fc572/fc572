package com.fc572.domain;


public class UserComment
{
    private String userId;
    private String userKey;
    private String userComment;

    public UserComment(String userId, String userKey, String userComment)
    {
        this.userId = userId;
        this.userKey = userKey;
        this.userComment = userComment;
    }

    public String getUserId()
    {
        return userId;
    }

    public void setUserId(String userId)
    {
        this.userId = userId;
    }

    public String getUserKey()
    {
        return userKey;
    }

    public void setUserKey(String userKey)
    {
        this.userKey = userKey;
    }

    public String getUserComment()
    {
        return userComment;
    }

    public void setUserComment(String userComment)
    {
        this.userComment = userComment;
    }
}
