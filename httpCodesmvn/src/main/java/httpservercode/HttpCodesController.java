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
        model.addAttribute("message", "Please insert the HTTP code");
        return "firstpage";
    }

    @RequestMapping(value="/form", method = RequestMethod.POST)
    public String handleForm(@RequestParam(value="codeInput", required=true) String codeInput,
                             Model model)
    {

        int codeInputAsInt;

        try
        {
            codeInputAsInt = Integer.parseInt(codeInput);
            try
            {
                response = codesAreHere.getMessage(codeInputAsInt);
                model.addAttribute("messageCode", codeInputAsInt);
                model.addAttribute("messageToAHuman", response);
                return "codefoundpage";
            }
            catch(Exception ex)
            {
                model.addAttribute("message", ex.getMessage());
                model.addAttribute("messageCode", codeInputAsInt);
                return "codenotfoundpage";
            }
        }
        catch (NumberFormatException ex)
        {
            model.addAttribute("message", "The input is not valid, please insert only numbers");
            model.addAttribute("messageCode", codeInput);
            return "codenotfoundpage";
        }
        //The controller only returns the view, not the content of the view or any logic
        //that has to do with the view
    }

    @RequestMapping(value="/testPage", method = RequestMethod.GET)
    public String testPageHandler()
    {
        return "testpage";
    }

    @RequestMapping(value="/testPageLinkBack", method = RequestMethod.GET)
    public String testpagelinkbackHandler()
    {
        return "testpagelinkback";
    }
}
