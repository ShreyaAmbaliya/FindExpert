/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package q1;
import java.util.*;

//Custom Exceptions for Constraints
//Containt 1 : (1 <= Test Case <= 10)
class TestcaseException extends Exception {
    TestcaseException(String emsg) {
        super(emsg);
    }
}

//Containt 2 : (1 <= Chocolates <= 1000)
class ChocolateException extends Exception {
    ChocolateException(String emsg) {
        super(emsg);
    }
}

//Containt 3 : (1 <= Students <= 100)
class StudentException extends Exception {
    StudentException(String emsg) {
        super(emsg);
    }
}

//to store answers for all testcases
class myList {
    int testCase;
    int leftChocolate;

    myList(int testCase, int leftChocolate) {
        this.testCase = testCase;
        this.leftChocolate = leftChocolate;
    }
}

public class ChocolateDistribution {
    
    public static void main(String[] args) throws TestcaseException, ChocolateException, StudentException {
        Scanner sc = new Scanner(System.in);
        System.out.println("number of TestCases: ");
        int testCase = sc.nextInt();
        if (testCase < 1 || testCase > 10) {                //if failes throws exception
            throw new TestcaseException("Invalid Number of Test Cases (1 <= TestCases <= 10)");
        }

        List<myList> list = new ArrayList<myList>();
        //loop will run for number of test cases
        for (int i = 0; i < testCase; i++) {                    //this loop will run total number of testcases times
            int j=i+1;
            System.out.println("\n====== For Testcase: "+ j + " ======");
            System.out.println("number of chocolates: ");
            int c = sc.nextInt();
            if (c < 1 || c > 1000) {            //if failes throws exception
                throw new ChocolateException("Invalid Number of Chocolates (1 <= Chocolates <= 1000)");
            }

            System.out.println("number of students: ");
            int n = sc.nextInt();
            if (n < 1 || n > 100) {             //if failes throws custom exception
                throw new StudentException("Invalid Number of Students (1 <= number_of_Students <= 100)");
            }

            int minChocolates = (n * (n + 1)) / 2;          //the total chocolates needed is
            int remainChocolates;

            if (minChocolates > c) {     //if the total number of chocolates is less than the needed chocolates then total chocolates are the  ones that left    
                remainChocolates=c;
            } else { //if there is more chocolates
                remainChocolates=(c-minChocolates) % n;
            }
            myList l1 = new myList(i+1, remainChocolates);
            list.add(l1);
        }
        for (myList a : list) {
            System.out.println("\nTestCase: " + a.testCase + "\n" + "Minimum number of Chocolates left: " + a.leftChocolate);
        }
    }
}
