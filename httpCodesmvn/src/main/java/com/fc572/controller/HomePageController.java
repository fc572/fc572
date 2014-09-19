package com.fc572.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class HomePageController
{
    public HomePageController()
    {
    }

    @RequestMapping(value="/", method = RequestMethod.GET)
    public String defaultHomePageHandler(ModelMap model)
    {
        model.addAttribute("message", "This is firstPage");
        return "firstpage";
    }

    @RequestMapping(value="/testpage", method = RequestMethod.GET)
    public String testPageHandler()
    {
        return "testpage";
    }

    @RequestMapping(value="/testpagelinkback", method = RequestMethod.GET)
    public String testpagelinkbackHandler()
    {
        return "testpagelinkback";
    }
}
