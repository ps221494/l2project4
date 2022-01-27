using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Login.Models
{
    public class User_Roles
    {
        private ulong id;

        public ulong ID
        {
            get { return id; }
            set { id = value; }
        }
        private int user_id;

        public int User_ID
        {
            get { return user_id; }
            set { user_id = value; }
        }

        private int role_id;

        public int Role_ID
        {
            get { return role_id; }
            set { role_id = value; }
        }



    }
}
