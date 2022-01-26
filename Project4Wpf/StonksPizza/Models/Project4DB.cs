using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace StonksPizza.Models
{
    public class Project4DB
    {
        private MySqlConnection conn = new MySqlConnection(ConfigurationManager.ConnectionStrings["StonksPizzaConn"].ConnectionString);

        public List<Users_Roles> GetAllUsers()
        {
            List<Users_Roles> result = new List<Users_Roles>();

            try
            {
                conn.Open();
                MySqlCommand sql = conn.CreateCommand();
                sql.CommandText = @"SELECT users.id, users.name, users.email, users.password,roles.Rname 
                                    FROM user_roles 
                                    INNER JOIN users ON user_roles.user_id = users.id 
                                    INNER JOIN roles on user_roles.role_id = roles.id" ;
                MySqlDataReader reader = sql.ExecuteReader();
                DataTable table = new DataTable();
                table.Load(reader);

                foreach (DataRow row in table.Rows)
                {
                    Users_Roles users = new Users_Roles();
                    users.ID = (ulong)row["id"];
                    users.Name = (string)row["name"];
                    users.Email = (string)row["email"];
                    users.Password = (string)row["password"];
                    users.RName = (string)row["Rname"];
                    result.Add(users);
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("***GetAllWedstrijden***");
                Console.WriteLine(e.Message);

                return null;
            }
            finally
            {
                if (conn.State == ConnectionState.Open)
                {
                    conn.Close();
                }
            }

            return result;
        }

    }
}
