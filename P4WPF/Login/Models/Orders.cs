using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Login.Models
{
   public class Orders
    {
        private ulong oid;

        public ulong Oid
        {
            get { return oid; }
            set { oid = value; }
        }

        private ulong uid;

        public ulong Uid
        {
            get { return uid; }
            set { uid = value; }
        }
    }
}
