package com.fc572.controller;

import com.fc572.domain.UserComment;
import com.fc572.logic.CommentService;
import com.fc572.logic.impl.exceptions.OperationFailedException;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
@RequestMapping("/comment")
public class UserCommentController
{

    public UserCommentController(UserComment userComment, CommentService commentService)
    {
        this.userComment = userComment;
        this.commentService = commentService;

    }

    private UserComment userComment;
    private CommentService commentService;

    @RequestMapping(value="/", method = RequestMethod.GET)
    public String defaultCommentHandler(Model model)
    {
        model.addAttribute("message", "Please insert a comment");

        return "commentPage";
    }

    @RequestMapping(value="/read", method = RequestMethod.GET)
    public String readComment(@RequestParam(value="userId", required=true) String userId,
                              @RequestParam(value="userKey", required=true) String userKey,
                              ModelMap model) throws OperationFailedException
    {
        try
        {
            userComment = commentService.readComment(userId, userKey);

            model.addAttribute("message", "Please insert a comment");

            model.addAttribute("userId", userComment.getUserId());
            model.addAttribute("userKey", userComment.getUserKey());
            model.addAttribute("comment", userComment.getUserComment());
        }
        catch(Exception e)
        {
            model.addAttribute("message", e.getMessage());
        }

        return "commentPage";
    }

    @RequestMapping(value="/write", method = RequestMethod.POST)
    public String writeComment(@RequestParam(value="writeUserId", required=true) String userId,
                               @RequestParam(value="writeUserKey", required=true) String userKey,
                               @RequestParam(value="writeComment", required=true) String comment,
                               Model model) throws OperationFailedException
    {
        try
        {
            commentService.writeComment(userId, userKey, comment);
            model.addAttribute("message", "Your comment has been saved");
        }
        catch(Exception e)
        {
            model.addAttribute("message", e.getMessage());
        }
        return "commentPage";
    }

    @RequestMapping(value="/delete", method = RequestMethod.DELETE)
    public String deleteComment(@RequestParam(value="userId", required=true) String userId,
                                @RequestParam(value="userKey", required=true) String userKey,
                                Model model) throws OperationFailedException
    {
        try
        {
            commentService.deleteComment(userId, userKey);
            model.addAttribute("message", "Your comment has been deleted");
        }
        catch(Exception e)
        {
           model.addAttribute("message", e.getMessage());
        }
        return "commentPage";
    }
}
