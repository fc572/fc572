package httpservercode;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class HttpCodesController
{
    @Autowired
    private CodesAreHere codesAreHere;
    private String response;

    @RequestMapping(value="/", method = RequestMethod.GET)
    public String defaultHandler(ModelMap model)
    {
        model.addAttribute("message", "Please insert an http code numeric value");
        return "firstpage";
    }

    @RequestMapping(value="/form", method = RequestMethod.POST)
    public String handleForm(@RequestParam(value="numericValue", required=true) int numericValue,
                             Model model)
    {

        model.addAttribute("messageCode", numericValue);

        try
        {
            response = codesAreHere.getMessage(numericValue);
            model.addAttribute("messageToAHuman", response);
            return "codefoundpage";
        }
        catch(Exception ex)
        {
            model.addAttribute("message", ex.getMessage());
            return "codenotfoundpage";
        }
        //The controller only returns the view, not the content of the view or any logic
        //that has to do with the view
    }
}
