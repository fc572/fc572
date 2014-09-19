package com.fc572.repository;


import com.fc572.domain.UserComment;

public interface UserCommentRepo
{
    public void writeUserComment(String userId, String userKey, String comment);

    public UserComment getUserComment(String userId, String userKey);

    public void deleteComment(String userId, String userKey);
}
