import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;

/**
 * Created by Francesco.Calvino on 14/05/2014.
 */
public class BusinessLogicEngineAutowired {

    @Autowired //This is a field annotation, so one is required for each field in the class that needs to be autowired.
    @Qualifier("myhelper2") //This is to indicate which bean to use from applicationContext.xml
    private DatabaseHelper dbHelper; //the one matched in the bean applicationcontext.xml file

    public BusinessLogicEngineAutowired()
    {

    }//default constructor needed by spring to build the object

//    public BusinessLogicEngineAutowired(DatabaseHelper dbHelper){
//        this.dbHelper = dbHelper;
//    } //this is not required when using autowired


    //this is not required when using autowired
//    public void setDbHelper(DatabaseHelper dbHelper) {
//        this.dbHelper = dbHelper;
//    }


    public void printSomething(){
        System.out.println(this.dbHelper.toString());
    }

    public void startEngine(){
        System.out.println("Autowired Engine started !");
    }
}
