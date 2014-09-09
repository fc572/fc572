package com.packt.webstore.domain.repository.impl;

import com.packt.webstore.domain.Customer;
import com.packt.webstore.domain.repository.CustomerRepository;
import org.springframework.stereotype.Repository;

import java.util.ArrayList;
import java.util.List;


@Repository
public class InMemoryCustomerRepository implements CustomerRepository
{
    private List<Customer> customers = new ArrayList<Customer>();

    public InMemoryCustomerRepository()
    {

        Customer customerOne = new Customer();
        customerOne.setAddress("Address of Customer One");
        customerOne.setCustomerId("1");
        customerOne.setName("CustomerOneName");
        customerOne.setSurname("CustomerOneSurname");
        customerOne.setNumberOfOrdersMade(0);

        customers.add(customerOne);

        Customer customerTwo = new Customer();
        customerTwo.setAddress("Address of Customer Two");
        customerTwo.setCustomerId("2");
        customerTwo.setName("CustomerTwoName");
        customerTwo.setSurname("CustomerTwoSurname");
        customerTwo.setNumberOfOrdersMade(0);

        customers.add(customerTwo);

        Customer customerThree = new Customer();
        customerThree.setAddress("Address of Customer Three");
        customerThree.setCustomerId("3");
        customerThree.setName("CustomerThreeName");
        customerThree.setSurname("CustomerThreeSurname");
        customerThree.setNumberOfOrdersMade(0);

        customers.add(customerThree);

        Customer customerFour = new Customer();
        customerFour.setAddress("Address of Customer Four");
        customerFour.setCustomerId("4");
        customerFour.setName("CustomerFourName");
        customerFour.setSurname("CustomerFourSurname");
        customerFour.setNumberOfOrdersMade(0);

        customers.add(customerFour);

    }


    @Override
    public List<Customer> getAllCustomers()
    {
        return customers;
    }
}
