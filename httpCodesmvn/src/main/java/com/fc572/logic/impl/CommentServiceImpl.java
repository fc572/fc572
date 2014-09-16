package com.fc572.logic.impl;

import com.fc572.domain.UserComment;
import com.fc572.logic.CommentService;
import com.fc572.logic.impl.exceptions.OperationFailedException;
import com.fc572.repository.UserCommentRepo;
import org.springframework.beans.factory.annotation.Autowired;

public class CommentServiceImpl implements CommentService
{

    @Autowired
    private UserCommentRepo userCommentRepo;

    @Override
    public UserComment readComment(String userId, String userKey) throws OperationFailedException
    {
        try
        {
            return this.userCommentRepo.getUserComment(userId, userKey);
        }
        catch(Exception ofex)
        {
            throw new OperationFailedException("There isn't a comment for this user", ofex);
        }
    }

    @Override
    public void writeComment(String userId, String userKey, String comment) throws OperationFailedException
    {
        try
        {
            this.userCommentRepo.writeUserComment(userId, userKey, comment);
        }
        catch (Exception ofex)
        {
            throw new OperationFailedException("It was not possible to save your comment", ofex);
        }
    }
}
