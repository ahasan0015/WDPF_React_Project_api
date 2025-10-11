import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Payment } from "../../../interfaces/payment.interface";
import paymentDefault from "../../../interfaces/payment.interface";

function CreatePayment() {
    const [payment, setPayment] = useState<Payment>(paymentDefault);
    const [payment_statuss, setPayment_status] = useState<Payment_status[]>([]);
    const [payment_methos, setPayment_metho] = useState<Payment_metho[]>([]);
    const [bookings, setBooking] = useState<Booking[]>([]);
    const [payments, setPayment] = useState<Payment[]>([]);

    useEffect(() => {
        document.title = "Create Payment";
            getPayments();
            getBookings();
            getPayment_methos();
            getPayment_statuss();
    }, []);

    const getPayment_statuss = () => {
        api.get("payment_statuss")
        .then((res) => {
            setPayment_status(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getPayment_methos = () => {
        api.get("payment_methos")
        .then((res) => {
            setPayment_metho(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getBookings = () => {
        api.get("bookings")
        .then((res) => {
            setBooking(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getPayments = () => {
        api.get("payments")
        .then((res) => {
            setPayment(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-payment", payment)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.log(err);
        });
    }

    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/payments" className="text-muted fw-light">Payments /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Payment</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Payment Id</label>
                        <select name="payment_id" className="form-select" onChange={(e) => setPayment({...payment, payment_id: parseInt(e.target.value)})}>
                            {
                                payments.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Booking Id</label>
                        <select name="booking_id" className="form-select" onChange={(e) => setPayment({...payment, booking_id: parseInt(e.target.value)})}>
                            {
                                bookings.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Amount</label>
                        <input type="text" name="amount" className="form-control" 
                        value={payment.amount} 
                        onChange={(e) => setPayment({...payment, amount: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Payment Date</label>
                        <input type="text" name="payment_date" className="form-control" 
                        value={payment.payment_date} 
                        onChange={(e) => setPayment({...payment, payment_date: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Payment Method Id</label>
                        <select name="payment_method_id" className="form-select" onChange={(e) => setPayment({...payment, payment_method_id: parseInt(e.target.value)})}>
                            {
                                payment_methos.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Payment Status Id</label>
                        <select name="payment_status_id" className="form-select" onChange={(e) => setPayment({...payment, payment_status_id: parseInt(e.target.value)})}>
                            {
                                payment_statuss.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreatePayment;