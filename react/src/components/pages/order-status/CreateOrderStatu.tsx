import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { OrderStatu } from "../../../interfaces/orderStatu.interface";
import orderStatuDefault from "../../../interfaces/orderStatu.interface";

function CreateOrderStatu() {
    const [orderStatu, setOrderStatu] = useState<OrderStatu>(orderStatuDefault);

    useEffect(() => {
        document.title = "Create OrderStatu";
    }, []);

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-orderStatu", orderStatu)
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
            <Link to="/order-status" className="text-muted fw-light">OrderStatus /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create OrderStatu</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Name</label>
                        <input type="text" name="name" className="form-control" 
                        value={orderStatu.name} 
                        onChange={(e) => setOrderStatu({...orderStatu, name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateOrderStatu;