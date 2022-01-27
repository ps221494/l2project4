using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Login.Models
{
   public class Users : Role
    {
        private ulong _id;
        private string _name;
        private string _email;
        private string _password;


        public ulong id
        {
            get { return _id; }
            set { _id = value; }
        }

        public string name
        {
            get { return _name; }
            set { _name = value; }
        }

        public string email
        {
            get { return _email; }
            set { _email = value; }

        }
        public string password
        {
            get { return _password; }
            set { _password = value; }
        }
    }
}
