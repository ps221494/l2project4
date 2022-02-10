using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;     // Click de System.Configuration aan in References
using System.Data;

namespace Login.Models
{
    public class ProjectDB
    {
        private MySqlConnection _conn = new MySqlConnection(ConfigurationManager.ConnectionStrings["stonkspizzastring"].ConnectionString);
        #region mainwindow
        public List<User_Roles> GetUsers()
        {
            List<User_Roles> resultaat = new List<User_Roles>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT users.id, users.Name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id INNER JOIN roles on user_roles.role_id = roles.id";
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    User_Roles users = new User_Roles();

                    users.ID = (ulong)rij["id"];
                    users.Name = (string)rij["Name"];
                    users.email = (string)rij["email"];
                    users.password = (string)rij["password"];
                    users.RoleName = (string)rij["rname"];

                    Console.ReadLine();
                    resultaat.Add(users);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return resultaat;
        }


        public bool VerifyLogin(string txtname, string Password)
        {
            bool islogged = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT Name, email, password "
                    + "FROM users " +
                    "WHERE Name = @Name";
                command.Parameters.AddWithValue("@Name", txtname);
                command.Parameters.AddWithValue("@password", Password);
                MySqlDataReader reader = command.ExecuteReader();

                while (reader.Read())
                {
                    if ((string)reader["Name"] == txtname)
                    {
                        if (BCrypt.Net.BCrypt.Verify(Password, (string)reader["password"]))
                        {
                            islogged = true;
                        }

                    }
                    else
                    {
                        islogged = false;
                    }
                }
            }
            catch (Exception e)
            {
                Console.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();
            }
            return islogged;
        }
        #endregion
        public List<pizzas> GetOrder_Details()
        {
            List<pizzas> resultaat = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT order_details.id, order_details.order_id, order_details.pizza_id, order_details.quantity, order_details.status, users.name FROM order_detials " +
                    "INNER JOIN users on users.name";
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas order_details = new pizzas();

                    order_details.OrderDetailid = (ulong)rij["id"];
                    order_details.Order_ID = (ulong)rij["order_id"];
                    order_details.Pizza_ID = (ulong)rij["pizza_id"];
                    order_details.Quantity = (int)rij["quantity"];
                    order_details.Status = (string)rij["status"];
                    order_details.Name = (string)rij["name"];

                    Console.ReadLine();
                    resultaat.Add(order_details);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return resultaat;
        }
        public List<Employee> GetEmployeeDetails()
        {
            List<Employee> resutl = new List<Employee>();

            try
            {
                _conn.Open();
                MySqlCommand cmd = _conn.CreateCommand();
                cmd.CommandText = "SELECT id, first_name, last_name, address, phone, zipcode, city, country, personal_email, birth_date, burger_service_nummer FROM employees";

                MySqlDataReader reader = cmd.ExecuteReader();
                DataTable dt = new DataTable();
                dt.Load(reader);
                foreach (DataRow row in dt.Rows)
                {
                    Employee employeedetails = new Employee();

                    employeedetails.Id = (ulong)row["id"];
                    employeedetails.FirstName = (string)row["first_name"];
                    employeedetails.LastName = (string)row["last_name"];
                    employeedetails.Adress = (string)row["address"];
                    employeedetails.Phone = (string)row["phone"];
                    employeedetails.Zipcode = (string)row["zipcode"];
                    employeedetails.City = (string)row["city"];
                    employeedetails.Country = (string)row["country"];
                    employeedetails.Pemail = (string)row["personal_email"];
                    employeedetails.Bsn = (string)row["burger_service_nummer"];

                    Console.ReadLine();
                    resutl.Add(employeedetails);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();
            }

            return resutl;
        }




        public List<pizzas> GetRecievedOrder_Details()
        {
            List<pizzas> resultaat = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                     "SELECT order_detials.id, order_detials.order_id, order_detials.pizza_id, order_detials.quantity, order_detials.status, orders.user_id," +
                     " users.name, pizzas.pname " +
                     "FROM order_detials " +
                     "INNER JOIN orders ON order_detials.order_id = orders.id " +
                     "INNER JOIN users on orders.user_id = users.id " +
                     "INNER JOIN pizzas on order_detials.pizza_id = pizzas.id WHERE status = @status";
                command.Parameters.AddWithValue("@status", "ontvangen");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas order_details = new pizzas();

                    order_details.OrderDetailid = (ulong)rij["id"];
                    order_details.Order_ID = (ulong)rij["order_id"];
                    order_details.Pizza_ID = (ulong)rij["pizza_id"];
                    order_details.Quantity = (int)rij["quantity"];
                    order_details.Status = (string)rij["status"];
                    order_details.Name = (string)rij["name"];
                    order_details.Pname = (string)rij["pname"];

                    Console.ReadLine();
                    resultaat.Add(order_details);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return resultaat;
        }

        public List<pizzas> GetAccepterOrders()
        { // "SELECT users.id, users.Name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id 
            //INNER JOIN roles on user_roles.role_id = roles.id";
            List<pizzas> result = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT order_detials.id, order_detials.order_id, order_detials.pizza_id, order_detials.quantity, order_detials.status," +
                    " users.id, users.Name, users.email, pizzas.pname " +
"FROM order_detials " +
"INNER JOIN orders ON order_detials.order_id = orders.id " +
"INNER JOIN users on orders.user_id = users.id " +
"INNER JOIN pizzas on order_detials.pizza_id = pizzas.id " +
"WHERE status = @status";
                command.Parameters.AddWithValue("@status", "bereiden");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas acceptedorder = new pizzas();

                    acceptedorder.OrderDetailid = (ulong)rij["id"];
                    acceptedorder.Order_ID = (ulong)rij["order_id"];
                    acceptedorder.Pizza_ID = (ulong)rij["pizza_id"];
                    acceptedorder.Quantity = (int)rij["quantity"];
                    acceptedorder.Status = (string)rij["status"];
                    acceptedorder.Name = (string)rij["Name"];
                    acceptedorder.Pname = (string)rij["pname"];
                    acceptedorder.email = (string)rij["email"];
                    acceptedorder.OrderDetailid = (ulong)rij["id"];

                    Console.ReadLine();
                    result.Add(acceptedorder);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return result;
        }

        public List<pizzas> GetInOvenOrders()
        { // "SELECT users.id, users.Name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id 
            //INNER JOIN roles on user_roles.role_id = roles.id";
            List<pizzas> result = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT order_detials.id, order_detials.order_id, order_detials.pizza_id, order_detials.quantity, order_detials.status," +
                    " users.id, users.Name, users.email, pizzas.pname " +
"FROM order_detials " +
"INNER JOIN orders ON order_detials.order_id = orders.id " +
"INNER JOIN users on orders.user_id = users.id " +
"INNER JOIN pizzas on order_detials.pizza_id = pizzas.id " +
"WHERE status = @status";
                command.Parameters.AddWithValue("@status", "in de oven");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas acceptedorder = new pizzas();

                    acceptedorder.OrderDetailid = (ulong)rij["id"];
                    acceptedorder.Order_ID = (ulong)rij["order_id"];
                    acceptedorder.Pizza_ID = (ulong)rij["pizza_id"];
                    acceptedorder.Quantity = (int)rij["quantity"];
                    acceptedorder.Status = (string)rij["status"];
                    acceptedorder.Name = (string)rij["Name"];
                    acceptedorder.Pname = (string)rij["pname"];
                    acceptedorder.email = (string)rij["email"];
                    acceptedorder.OrderDetailid = (ulong)rij["id"];

                    Console.ReadLine();
                    result.Add(acceptedorder);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return result;
        }

        public List<pizzas> GetDeliveryOrders()
        { // "SELECT users.id, users.Name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id 
            //INNER JOIN roles on user_roles.role_id = roles.id";
            List<pizzas> result = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT order_detials.id, order_detials.order_id, order_detials.pizza_id, order_detials.quantity, order_detials.status," +
                    " users.id, users.Name, users.email, pizzas.pname " +
"FROM order_detials " +
"INNER JOIN orders ON order_detials.order_id = orders.id " +
"INNER JOIN users on orders.user_id = users.id " +
"INNER JOIN pizzas on order_detials.pizza_id = pizzas.id " +
"WHERE status = @status";
                command.Parameters.AddWithValue("@status", "onderweg naar bezorgadress");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas acceptedorder = new pizzas();

                    acceptedorder.OrderDetailid = (ulong)rij["id"];
                    acceptedorder.Order_ID = (ulong)rij["order_id"];
                    acceptedorder.Pizza_ID = (ulong)rij["pizza_id"];
                    acceptedorder.Quantity = (int)rij["quantity"];
                    acceptedorder.Status = (string)rij["status"];
                    acceptedorder.Name = (string)rij["Name"];
                    acceptedorder.Pname = (string)rij["pname"];
                    acceptedorder.email = (string)rij["email"];


                    Console.ReadLine();
                    result.Add(acceptedorder);
                }
            }
            catch (Exception e)
            {

                Console.Error.WriteLine(e.Message);
            }
            finally
            {
                _conn.Close();

            }
            return result;
        }

        public bool UpdateOrderStatus(ulong order_id, pizzas order_details)
        {
            bool result = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "UPDATE order_detials" +
                    " SET status = @status WHERE order_id = @order_id";
                command.Parameters.AddWithValue("@order_id", order_id);
                command.Parameters.AddWithValue("@status", "bereiden");
                result = command.ExecuteNonQuery() >= 1;
            }
            catch (Exception e)
            {
                Console.Error.WriteLine(e.Message);
                return false;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return result;
        }

        public bool UpdateToOvenOrderStatus(ulong order_id, pizzas order_details)
        {
            bool ovenresult = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "UPDATE order_detials" +
                    " SET status = @status WHERE order_id = @order_id";
                command.Parameters.AddWithValue("@order_id", order_id);
                command.Parameters.AddWithValue("@status", "in de oven");
                ovenresult = command.ExecuteNonQuery() >= 1;
            }
            catch (Exception e)
            {
                Console.Error.WriteLine(e.Message);
                return false;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return ovenresult;
        }

        public bool UpdateToDelivery(ulong order_id, pizzas order_details)
        {
            bool ovenresult = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "UPDATE order_detials" +
                    " SET status = @status WHERE order_id = @order_id";
                command.Parameters.AddWithValue("@order_id", order_id);
                command.Parameters.AddWithValue("@status", "onderweg naar bezorgadress");
                ovenresult = command.ExecuteNonQuery() >= 1;
            }
            catch (Exception e)
            {
                Console.Error.WriteLine(e.Message);
                return false;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return ovenresult;
        }

        public bool OrderDeliverd(ulong order_id, pizzas order_details)
        {
            bool Deliveryresult = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "DELETE FROM order_detials WHERE order_id = @order_id AND status = @status";
                command.Parameters.AddWithValue("@order_id", order_id);
                command.Parameters.AddWithValue("@status", "onderweg naar bezorgadress");
                Deliveryresult = command.ExecuteNonQuery() >= 1;
            }
            catch (Exception e)
            {
                Console.Error.WriteLine(e.Message);
                return false;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return Deliveryresult;
        }

        public bool CreateEmployee(Employee e, DateTime birthday)
        {
            bool CreateEmployeeresult = false;

            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "INSERT INTO employees (first_name, last_name, address, phone, zipcode, city, country, personal_email, " +
                    "birth_date, burger_service_nummer)" +
                    " VALUES (@first_name, @last_name, @address, @phone, @zipcode, @city, @country, @personal_email, " +
                    "@birth_date, @burger_service_nummer)";
                command.Parameters.AddWithValue("@first_name", e.FirstName);
                command.Parameters.AddWithValue("@last_name", e.LastName);
                command.Parameters.AddWithValue("@address", e.Adress);
                command.Parameters.AddWithValue("@phone", e.Phone);
                command.Parameters.AddWithValue("@zipcode", e.Zipcode);
                command.Parameters.AddWithValue("@city", e.City);
                command.Parameters.AddWithValue("@country", e.Country);
                command.Parameters.AddWithValue("@personal_email", e.Pemail);
                command.Parameters.AddWithValue("@birth_date", birthday);
                command.Parameters.AddWithValue("@burger_service_nummer", e.Bsn);

                CreateEmployeeresult = command.ExecuteNonQuery() >= 0;
            }
            catch (Exception)
            {

                throw;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return CreateEmployeeresult;
        }

        public bool DeleteEmployee(string Id)
        {
            bool DeleteEmployeeresult = false;

            try
            {
                _conn.Open();
                MySqlCommand deleteCommand = _conn.CreateCommand();
                deleteCommand.CommandText = "DELETE FROM employees WHERE id = @id";

                deleteCommand.Parameters.AddWithValue("@id", Id);
              

                DeleteEmployeeresult = deleteCommand.ExecuteNonQuery() >= 0;
            }
            catch (Exception)
            {

                throw;
            }
            finally
            {
                _conn.Close();
            }
            return DeleteEmployeeresult;
        }

       public bool UpdateEmployee(Employee e, DateTime date)
        {
            bool result = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "UPDATE `employees` SET first_name = @Fname," +
                    "last_name = @Lname, address = @adres, phone = @phone, zipcode = @zipcode," +
                    "city = @city, country = @land, personal_email = @email, birth_date = @date," +
                    "burger_service_nummer = @bsn WHERE id = @id";
                command.Parameters.AddWithValue("@id", e.Id);
                command.Parameters.AddWithValue("@Fname", e.FirstName);
                command.Parameters.AddWithValue("@Lname", e.LastName);
                command.Parameters.AddWithValue("@adres", e.Adress);
                command.Parameters.AddWithValue("@phone", e.Phone);
                command.Parameters.AddWithValue("@zipcode", e.Zipcode);
                command.Parameters.AddWithValue("@city", e.City);
                command.Parameters.AddWithValue("@land", e.Country);
                command.Parameters.AddWithValue("@email", e.Pemail);
                command.Parameters.AddWithValue("@date", date);
                command.Parameters.AddWithValue("@bsn", e.Bsn);
                result = command.ExecuteNonQuery() >= 1;
            }
            catch (Exception)
            {
                return false;
            }
            finally
            {
                if (_conn.State == ConnectionState.Open)
                {
                    _conn.Close();
                }
            }

            return result;

        }

        public DataTable SelectMedewerkers()
        {
            DataTable employees = new DataTable();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "SELECT * FROM employees; ";
                MySqlDataReader lezer = command.ExecuteReader();
                employees.Load(lezer);
            }
            catch (Exception)
            {

                throw;
            }
            finally
            {
                _conn.Close();
            }
            return employees;
        }

        public List<pizzas> SelectPizzas()
        {
            List<pizzas> Pizzas = new List<pizzas>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "SELECT * FROM pizzas; ";
                MySqlDataReader lezer = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(lezer);

                foreach (DataRow rij in table.Rows)
                {
                    pizzas pizza = new pizzas();

                    pizza.Pname = (string)rij["pname"];
                    pizza.Description = (string)rij["description"];
                    Pizzas.Add(pizza);
                }

            }
            catch (Exception)
            {

                throw;
            }
            finally
            {
                _conn.Close();
            }
            return Pizzas;
        }


        //dit is om pizza toetevoegen en op te halen.
        public List<Ingredient> GetAllIngredients()
        {
            List<Ingredient> result = new List<Ingredient>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "SELECT * FROM `ingredients`";
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);
                foreach (DataRow row in table.Rows)
                {
                    Ingredient ingredients = new Ingredient();
                    ingredients.Id = (ulong)row["id"];
                    ingredients.Name = (string)row["name"];
                    ingredients.Price = (decimal)row["price"];
                    result.Add(ingredients);
                }
            }
            catch (Exception)
            {

                throw;
            }
            finally
            {
                _conn.Close();
            }

            return result;
        }


    }
}

