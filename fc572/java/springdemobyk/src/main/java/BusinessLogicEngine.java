/**
 * Created by Francesco.Calvino on 14/05/2014.
 */
public class BusinessLogicEngine {

    private DatabaseHelper dbHelper; //the one matched in the bean applicationcontext.xml file

    public BusinessLogicEngine()
    {

    }//default constructor needed by spring to build the object

    public BusinessLogicEngine(DatabaseHelper dbHelper){
        this.dbHelper = dbHelper;
    }


    public void setDbHelper(DatabaseHelper dbHelper) {
        this.dbHelper = dbHelper;
    }


    public void printSomething(){
        System.out.println(this.dbHelper.toString());
    }

    public void startEngine(){
        System.out.println("Engine started!");
    }
}
