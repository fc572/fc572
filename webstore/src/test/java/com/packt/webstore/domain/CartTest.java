package com.packt.webstore.domain;

import org.junit.Assert;
import org.junit.Before;
import org.junit.Test;

import java.math.BigDecimal;

public class CartTest
{
    private Cart cart;
    private CartItem cartItem;

    @Before
    public void setup()
    {
        cart = new Cart();
        cartItem = new CartItem();
    }

    @Test
    public void granTotalShouldBeTheSameAsTheTotalIfThereIsOnlyOneItemInCart()
    {
        //Arrange
        cartItem.setProduct(new Product("P1234","iPhone 5s", new BigDecimal(500)));
        cart.addCartItem(cartItem);

        //Act
        BigDecimal granTotal = cart.getGrandTotal();

        //Assert
        Assert.assertEquals(cartItem.getTotalPrice(), granTotal);

    }

    @Test
    public void granTotalShouldBeGreaterThanCartTotalIfThereAreTwoOrMoreItemInCart()
    {
        //Arrange

        CartItem cartItem1 = new CartItem();
        CartItem cartItem2 = new CartItem();

        cartItem1.setProduct(new Product("P1234","iPhone 5s", new BigDecimal(500)));
        cartItem2.setProduct(new Product("P1345", "Dell Laptop", new BigDecimal(750)));

        cart.addCartItem(cartItem1);
        cart.addCartItem(cartItem2);

        //Act
        BigDecimal granTotal = cart.getGrandTotal();

        //Assert
        System.out.println("GT is " + granTotal + " while Total is " + cartItem1.getTotalPrice());

        Assert.assertTrue("The grand total is not greater than the partial total",
                cartItem1.getTotalPrice().compareTo(granTotal) < 0);
    }
}
