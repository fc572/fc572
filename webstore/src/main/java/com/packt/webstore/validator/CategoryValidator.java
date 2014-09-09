package com.packt.webstore.validator;

import com.packt.webstore.service.ProductService;
import org.springframework.beans.factory.annotation.Autowired;

import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import java.util.ArrayList;
import java.util.List;

public class CategoryValidator implements ConstraintValidator<Category, String>
{

    @Autowired
    private ProductService productService;
    List<String> allowedCategories = new ArrayList<String>();

    public void initialize(Category constraintAnnotation) {
        //  intentionally left blank; this is the place to initialize the constraint annotation for any sensible default values.
        allowedCategories.add("laptop");
        allowedCategories.add("tablet");
        allowedCategories.add("mobile phone");
        allowedCategories.add("desktop");
    }

    public boolean isValid(String value,ConstraintValidatorContext context)
    {
        for (String allowed : allowedCategories)
            {
                if(allowed.equalsIgnoreCase(value))
                {
                    return true;
                }
            }
        return false;
    }
}
