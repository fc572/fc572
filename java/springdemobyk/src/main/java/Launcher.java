import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

/**
 * Created by Francesco.Calvino on 14/05/2014.
 */
public class Launcher {

    public static void main(String[] args) {

        System.out.println("******************************* WINTER ************************************");

        System.out.println("Test Application");

        DatabaseHelper dbHelper = new DatabaseHelper();

        BusinessLogicEngine businessLogicEngine = new BusinessLogicEngine(dbHelper);

        businessLogicEngine.printSomething();

        System.out.println("******************************* SPRING *************************************");

        ApplicationContext cxt = new ClassPathXmlApplicationContext("applicationContext.xml");

        BusinessLogicEngine ble = (BusinessLogicEngine) cxt.getBean("myengine");

        ble.printSomething();
    }
}
