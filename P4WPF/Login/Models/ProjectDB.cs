using System;
using System.Collections.Generic;
using System.Configuration;     // Click de System.Configuration aan in References
using System.Data;
using MySql.Data.MySqlClient;

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
        public List<Order_details> GetOrder_Details()
        {
            List<Order_details> resultaat = new List<Order_details>();
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
                    Order_details order_details = new Order_details();

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

        public List<Order_details> GetRecievedOrder_Details()
        {
            List<Order_details> resultaat = new List<Order_details>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT id, order_id, pizza_id, quantity, status FROM order_detials WHERE status = @status";
                command.Parameters.AddWithValue("@status", "ontvangen");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    Order_details order_details = new Order_details();

                    order_details.OrderDetailid = (ulong)rij["id"];
                    order_details.Order_ID = (ulong)rij["order_id"];
                    order_details.Pizza_ID = (ulong)rij["pizza_id"];
                    order_details.Quantity = (int)rij["quantity"];
                    order_details.Status = (string)rij["status"];

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

        public List<Order_details> GetAccepterOrders()
        { // "SELECT users.id, users.Name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id 
            //INNER JOIN roles on user_roles.role_id = roles.id";
            List<Order_details> result = new List<Order_details>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT order_detials.id, order_detials.order_id, order_detials.pizza_id, order_detials.quantity, order_detials.status, users.id, users.Name, users.email " +
"FROM order_detials " +
"INNER JOIN orders ON order_detials.order_id = orders.id " +
"INNER JOIN users on orders.user_id = users.id " +
"WHERE status = @status";
                command.Parameters.AddWithValue("@status", "bereiden");
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    Order_details acceptedorder = new Order_details();

                    acceptedorder.OrderDetailid = (ulong)rij["id"];
                    acceptedorder.Order_ID = (ulong)rij["order_id"];
                    acceptedorder.Pizza_ID = (ulong)rij["pizza_id"];
                    acceptedorder.Quantity = (int)rij["quantity"];
                    acceptedorder.Status = (string)rij["status"];
                    acceptedorder.Name = (string)rij["Name"];
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

        public bool UpdateOrderStatus(ulong order_id, Order_details order_details)
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

        public bool UpdateToOvenOrderStatus(ulong order_id, Order_details order_details)
        {
            bool result = false;
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "UPDATE order_detials" +
                    " SET status = @status WHERE order_id = @order_id";
                command.Parameters.AddWithValue("@order_id", order_id);
                command.Parameters.AddWithValue("@status", "in de oven");
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

        public DataTable SelectPizzas()
        {
            DataTable Pizzas = new DataTable();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText = "SELECT * FROM pizzas; ";
                MySqlDataReader lezer = command.ExecuteReader();
                Pizzas.Load(lezer);
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
                    ingredients.Id = (ulong)row["Id"];
                    ingredients.Name = (string)row["Name"];
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

