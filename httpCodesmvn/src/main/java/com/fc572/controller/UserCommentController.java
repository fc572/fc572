package com.fc572.controller;

import com.fc572.domain.UserComment;
import com.fc572.repository.impl.UserCommentRepoImpl;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
public class UserCommentController
{

    public UserCommentController(UserComment userComment, UserCommentRepoImpl userCommentRepo)
    {
        this.userComment = userComment;
        this.userCommentRepo = userCommentRepo;
    }

    private UserComment userComment;
    private UserCommentRepoImpl userCommentRepo;

    @RequestMapping(value="/comment", method = RequestMethod.GET)
    public String readComment(@RequestParam(value="userId", required=true) String userId,
                              @RequestParam(value="userKey", required=true) String userKey,
                              Model model)
    {
        userComment = userCommentRepo.getUserComment(userId, userKey);

        model.addAttribute("message", "Please insert a comment");

        model.addAttribute("userId", userComment.getUserId());
        model.addAttribute("userKey", userComment.getUserKey());
        model.addAttribute("comment", userComment.getUserComment());

        return "commentPage";
    }

    @RequestMapping(value="/comment", method = RequestMethod.POST)
    public String writeComment(@RequestParam(value="userId", required=true) String userId,
                               @RequestParam(value="userKey", required=true) String userKey,
                               @RequestParam(value="comment", required=true) String comment,
    Model model)
    {
        model.addAttribute("message", "Do you want to add to the following comment(s)?");
        return "commentPage";
    }
}
