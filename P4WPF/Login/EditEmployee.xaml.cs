using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Login.Models;
using System.Runtime.CompilerServices;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Data;

namespace Login
{
    /// <summary>
    /// Interaction logic for EditEmployee.xaml
    /// </summary>
    public partial class EditEmployee : Window
    {
        ProjectDB _db = new ProjectDB();

        private Employee _employee;
        public Employee Employee
        {
            get { return _employee; }
            set { _employee = value; }
        }

        private ObservableCollection<Employee> _lstIDEmployee = new ObservableCollection<Employee>();

        public ObservableCollection<Employee> LSTIDemployee
        {
            get { return _lstIDEmployee; }
            set { _lstIDEmployee = value; }
        }
        public EditEmployee(Employee id)
        {
            InitializeComponent();
            Employee = id;
            DataContext = this;
        }

        private void editBtn_Click(object sender, RoutedEventArgs e)
        {
            if (Employee != null)
            {
                _db.UpdateEmployee(Employee,editDate.SelectedDate.Value);
            }
        }
    }
}
