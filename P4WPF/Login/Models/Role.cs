using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Login.Models
{
    public class Role
    {
        private ulong id;

        public ulong ID
        {
            get { return id; }
            set { id = value; }
        }

        private string roleName;

        public string RoleName
        {
            get { return roleName; }
            set { roleName = value; }
        }

    }
}
