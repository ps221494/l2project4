using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using System.ComponentModel;
using Login.Models;
using System.Runtime.CompilerServices;
using System.Collections.ObjectModel;

namespace Login.Models
{
   public class Order_details : Users , INotifyPropertyChanged 
    {
        #region PropertyChanged
        public event PropertyChangedEventHandler PropertyChanged;
        // Create the OnPropertyChanged method to raise the event
        // The calling member's Name will be used as the parameter.
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        #endregion

        private ulong id;
        public ulong ID
        {
            get { return id; }
            set { id = value; OnPropertyChanged(); }
        }
        private ulong order_id;

        public ulong Order_ID
        {
            get { return order_id; }
            set { order_id = value; OnPropertyChanged(); }
        }

        private ulong pizza_id;

        public ulong Pizza_ID
        {
            get { return pizza_id; }
            set { pizza_id = value; OnPropertyChanged(); }
        }

        private int quantity;
        public int Quantity
        {
            get { return quantity; }
            set { quantity = value; OnPropertyChanged(); }
        }

        private string status;

        public string Status
        {
            get { return status; }
            set { status = value; OnPropertyChanged(); }
        }

    }
}
