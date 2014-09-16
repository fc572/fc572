package com.fc572.logic.impl.exceptions;

public class OperationFailedException extends Exception
{
    public OperationFailedException(Throwable throwable)
    {
        super(throwable);
    }

    public OperationFailedException(String message, Throwable throwable)
    {
        super(message, throwable);
    }
}
