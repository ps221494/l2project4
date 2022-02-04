namespace Login.Models
{
    public class pizzas : Order_details
    {
      /*  private ulong id;

        public ulong Id
        {
            get { return id; }
            set { id = value; }
        }*/

        private string pname;

        public string Pname
        {
            get { return pname; }
            set { pname = value; }
        }

        private string description;

        public string Description
        {
            get { return description; }
            set { description = value; }
        }
    }
}
