package com.fc572.repository.impl;


import com.fc572.domain.UserComment;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

@SuppressWarnings("rawtypes")
public class UserCommentRowMapper implements RowMapper
{

    @Override
    public Object mapRow(ResultSet rs, int number) throws SQLException
    {
        UserComment userComment =
                new UserComment(rs.getString("userId"),rs.getString("userKey"),rs.getString("userComment"));
        return userComment;
    }
}
