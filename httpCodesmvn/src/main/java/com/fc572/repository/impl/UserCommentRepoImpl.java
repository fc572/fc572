package com.fc572.repository.impl;

import com.fc572.domain.UserComment;
import com.fc572.repository.UserCommentRepo;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

@Repository
public class UserCommentRepoImpl implements UserCommentRepo
{
    public UserCommentRepoImpl(JdbcTemplate jdbcTemplate)
    {
        this.jdbcTemplate = jdbcTemplate;
    }

    private JdbcTemplate jdbcTemplate;

    public JdbcTemplate getJdbcTemplate()
    {
        return jdbcTemplate;
    }

    @Override
    public void writeUserComment(String userId, String userKey, String comment)
    {
        String query = "INSERT INTO usercomment VALUES(\"" + userId + "\", \"" + userKey + "\", \"" + comment + "\")";

        jdbcTemplate.execute(query);

    }

@Override
    public UserComment getUserComment(String userId, String userKey)
    {
        //String query = "SELECT * from usercomment WHERE userId=\"" + userId + "\" AND userKey=\"" + userKey + "\"";

        String query = "SELECT * FROM usercomment WHERE userId = ? AND userKey = ?";

        Object userComment =
                 jdbcTemplate.queryForObject(query, new Object[]{userId, userKey}, new UserCommentRowMapper());

        return (UserComment) userComment; //cast object to expected type.

    }

    @Override
    public void deleteComment(String userId, String userKey)
    {
        String query = "DELETE from usercomment WHERE userId= \"" + userId + "\" AND userKey= \"" + userKey + "\"";

        jdbcTemplate.execute(query);
    }
}