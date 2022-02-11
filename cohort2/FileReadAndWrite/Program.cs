using System;
using System.IO;
using System.Collections.Generic;

namespace FileReadAndWrite
{
    class Program
    {
        public class products
        {
            public string name;
            public string image;
            public float price;
            public products(string one,string two, float three)
            {
                name = one;
                image = two;
                price = three;
            }
            public string Price
            {
                get { return price.ToString(); }
            }
        }
        static void Main(string[] args)
        {
            List<products> productList = new List<products>();
            TextReader textReader = new StreamReader("ProductData.csv");
            string line;
            while ((line = textReader.ReadLine()) != null)
            {
                string[] parts = line.Split(',');
               
                if (parts[1] == "")
                {
                    Console.Write("What name is the image for " + parts[0]);
                    parts[1]=Console.ReadLine();
                }
                products p = new products(parts[0],parts[1], (float)Convert.ToDouble(parts[2]));
                productList.Add(p);
            }
            textReader.Close();
            TextWriter textWriter = new StreamWriter("ProductData.csv");
            Console.WriteLine("Read And Write App");
            string yesNo;
            do {
                Console.Write("Enter the product name: ");
                string productName = Console.ReadLine();
                Console.Write("Enter an image file name ");
                string imageName = Console.ReadLine();
                float unitPrice = -1;
                bool validEntry = false;
                do
                {
                    try
                    {
                        Console.Write("What is the unit price for a " + productName + " in pounds ");
                        unitPrice = (float)Convert.ToDouble(Console.ReadLine());
                        validEntry = true;
                    }
                    catch (FormatException fe)
                    {
                        Console.WriteLine(fe + " You need to enter a number in numerals no words. In pounds! ");
                    }
                } while (!validEntry);
                products p = new products(productName, imageName, unitPrice);
                productList.Add(p);
                
                Console.Write("Do you want to add more data? ");
                yesNo = Console.ReadLine();
            }
            while (yesNo == "yes");
            foreach(products p in productList)
            {
                textWriter.WriteLine(p.name + "," + p.image + "," + p.Price);
            }
            textWriter.Close();

        }
    }
}
