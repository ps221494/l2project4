using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace StonksPizza.Models
{
    public class Role
    {
        private ulong id;

        public ulong ID
        {
            get { return id; }
            set { id = value; }
        }


        private string rname;

        public string RName
        {
            get { return rname; }
            set { rname = value; }
        }

    }
}
