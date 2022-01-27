using System;
using System.Collections.Generic;
using System.Configuration;     // Click de System.Configuration aan in References
using System.Data;
using System.Data.SqlClient;
using MySql.Data.MySqlClient;

namespace Login.Models
{
   public class ProjectDB
    {
        private MySqlConnection _conn = new MySqlConnection(ConfigurationManager.ConnectionStrings["stonkspizzastring"].ConnectionString);

        public List<Users> GetUsers()
        {
            List<Users> resultaat = new List<Users>();
            try
            {
                _conn.Open();
                MySqlCommand command = _conn.CreateCommand();
                command.CommandText =
                    "SELECT users.id, users.name, users.password, users.email, roles.id, roles.rname FROM user_roles INNER JOIN users ON user_roles.user_id = users.id INNER JOIN roles on user_roles.role_id = roles.id";
                MySqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow rij in table.Rows)
                {
                    Users users = new Users();

                    users.id = (ulong)rij["id"];
                    users.name = (string)rij["name"];
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
                    "SELECT name, email, password "
                    + "FROM users " +
                    "WHERE name = @name";
                command.Parameters.AddWithValue("@name", txtname);
                command.Parameters.AddWithValue("@password", Password);
                MySqlDataReader reader = command.ExecuteReader();

                while (reader.Read())
                {
                    if ((string)reader["name"] == txtname)
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
    }
}

