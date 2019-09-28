using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;
using MaterialSkin.Animations;

namespace WindowsFormsApplication1
{
    public partial class Form5 : MaterialForm
    {
        public Form5()
        {
            InitializeComponent();
        }

        private void groupBox1_Enter(object sender, EventArgs e)
        {
            
        }

        private void groupBox2_Enter(object sender, EventArgs e)
        {
            
        }

        private void groupBox4_Enter(object sender, EventArgs e)
        {
            
        }

        private void groupBox3_Enter(object sender, EventArgs e)
        {
          
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (checkBox4.Checked)
            {
                label4.Text = "RICE ARE NOT AVAILABLE";
            }

            else if (checkBox10.Checked)
            {
                label2.Text = "BALLS ARE NOT AVAILABLE ";

            }

            else
            {

                MessageBox.Show("YOUR ORDER PLACE SUCCESSFULLY");
                MessageBox.Show("THANKS FOR USING NAWAB SUPER STORE");
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            new Form2().Show();
        }

        private void Form5_Load(object sender, EventArgs e)
        {

        }
    }
}
