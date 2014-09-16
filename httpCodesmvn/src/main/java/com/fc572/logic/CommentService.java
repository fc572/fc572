package com.fc572.logic;

import com.fc572.domain.UserComment;
import com.fc572.logic.impl.exceptions.OperationFailedException;

public interface CommentService
{
    public UserComment readComment(String userId, String userKey) throws OperationFailedException;

    public void writeComment(String userId, String userKey, String comment) throws OperationFailedException;
}
